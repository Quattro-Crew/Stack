from flask import Flask, request, jsonify
import ollama
from flask_cors import CORS

app = Flask(__name__)
CORS(app)

model = 'SpeakLeash/bielik-4.5b-v3.0-instruct:Q8_0'

personality = (
    "Masz na imię Sebastian, "
    "jesteś przyjaznym i inteligentnym asystentem giełdowym. "
    "Odpowiadaj tylko na zapytania związane z giełdą. "
    "Inne tematy niezwiązane z giełdą cię nie interesują, nie znasz się na nich. "
    "Bądź miły i radosny. "
    "Odpowiadaj tak krótko jak to możliwe w sposób miły czy życzliwy. "
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