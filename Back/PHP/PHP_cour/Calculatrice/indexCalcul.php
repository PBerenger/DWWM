<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculatrice</title>
    <style>
        .calculator {
            width: 200px;
            margin: 100px auto;
        }
        .calculator input[type="text"] {
            width: 100%;
            height: 40px;
            text-align: right;
            margin-bottom: 10px;
        }
        .calculator button {
            width: 46px;
            height: 46px;
            margin: 2px;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <input type="text" id="display" disabled>
        <br>
        <button onclick="appendToDisplay('1')">1</button>
        <button onclick="appendToDisplay('2')">2</button>
        <button onclick="appendToDisplay('3')">3</button>
        <button onclick="appendToDisplay('+')">+</button>
        <br>
        <button onclick="appendToDisplay('4')">4</button>
        <button onclick="appendToDisplay('5')">5</button>
        <button onclick="appendToDisplay('6')">6</button>
        <button onclick="appendToDisplay('-')">-</button>
        <br>
        <button onclick="appendToDisplay('7')">7</button>
        <button onclick="appendToDisplay('8')">8</button>
        <button onclick="appendToDisplay('9')">9</button>
        <button onclick="appendToDisplay('*')">*</button>
        <br>
        <button onclick="appendToDisplay('0')">0</button>
        <button onclick="clearDisplay()">C</button>
        <button onclick="calculateResult()">=</button>
        <button onclick="appendToDisplay('/')">/</button>
    </div>

    <script>
        function appendToDisplay(value) {
            document.getElementById('display').value += value;
        }

        function clearDisplay() {
            document.getElementById('display').value = '';
        }

        function calculateResult() {
            let expression = document.getElementById('display').value;
            try {
                let result = eval(expression);
                document.getElementById('display').value = result;
            } catch (e) {
                document.getElementById('display').value = 'Erreur';
            }
        }
    </script>
</body>
</html>
