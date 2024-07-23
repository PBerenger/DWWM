import './App.css';
import { useState } from 'react';
import Personne from './Personne';


function App() {
  const [display, setDisplay] = useState('');

  const clearDisplay = () => {
    setDisplay('');
  };

  const appendToDisplay = (value) => {
    setDisplay((prev) => prev + value);
  };

  const calculate = () => {
    try {
      setDisplay(eval(display)); // eval peut être dangereux, mais pour une simple calculatrice ça peut aller
    } catch (error) {
      setDisplay('Error');
    }
  };

  return (
    <div className="App">
      <header className="App-header">
      </header>
        <div className="calculator">
          <input type="text" id="display" disabled value={display} />
          <button onClick={() => appendToDisplay('7')}>7</button>
          <button onClick={() => appendToDisplay('8')}>8</button>
          <button onClick={() => appendToDisplay('9')}>9</button>
          <button onClick={() => appendToDisplay('/')}>/</button>
          <button onClick={() => appendToDisplay('4')}>4</button>
          <button onClick={() => appendToDisplay('5')}>5</button>
          <button onClick={() => appendToDisplay('6')}>6</button>
          <button onClick={() => appendToDisplay('*')}>*</button>
          <button onClick={() => appendToDisplay('1')}>1</button>
          <button onClick={() => appendToDisplay('2')}>2</button>
          <button onClick={() => appendToDisplay('3')}>3</button>
          <button onClick={() => appendToDisplay('-')}>-</button>
          <button onClick={() => appendToDisplay('0')}>0</button>
          <button onClick={() => appendToDisplay('.')}>.</button>
          <button onClick={() => appendToDisplay('+')}>+</button>
          <button onClick={clearDisplay} className="clear">C</button>
          <button onClick={calculate} className="equals">=</button>
        </div>

      <Personne nom="Dupont" age="32" sexe="M"/>
      <Personne nom="Ducon" age="34" sexe="F"/>
      <Personne nom="Dufion" age="23" sexe="M"/>
    </div>
  );
}

export default App;
