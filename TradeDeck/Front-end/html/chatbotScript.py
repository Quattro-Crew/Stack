from flask import Flask, request, jsonify
import ollama
from flask_cors import CORS

app = Flask(__name__)
CORS(app)

model = 'SpeakLeash/bielik-11b-v2.3-instruct:Q6_K'

personality = (
    "Masz na imię Sebastian, "
    "jesteś przyjaznym i inteligentnym asystentem giełdowym. "
    "Odpowiadaj tylko na zapytania związane z giełdą. "
    "Nie znasz się na niczym innym niż giełda. "
    "Bądź miły i radosny. "
    "Odpowiadaj tak krótko jak to możliwe ale w sposób zrozumiały, miły i życzliwy. "
)


history = [
    {'role': 'system', 'content': personality}
]

@app.route('/chat', methods=['POST'])
def chat():
    try:
        data = request.json
        user_input = data.get('message', '')
        if not user_input:
            return jsonify({'error': 'No message provided'}), 400
    
        history.append({'role': 'user', 'content': user_input})

        response = ollama.chat(
            model=model,
            messages=history
        )

        reply = response['message']['content']
        history.append({'role': 'assistant', 'content': reply})

        return jsonify({'reply': reply})
    
    except Exception as e:
        print("Błąd po stronie serwera:", str(e))
        return jsonify({'error': 'Server error', 'details': str(e)}), 500

if __name__ == '__main__':
    app.run(debug=True)