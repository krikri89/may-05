// import logo from './logo.svg';
import { useState } from 'react';
import randomNumber from './Component/function/function';
import './App.css';

function App() {
  const [round, setRound] = useState('round');
  const [number, setNumber] = useState([]);

  const handleChangeShape = () => {
    setRound((oldShape) => (oldShape === 'round' ? 'square' : 'round'));
  };
  const handleNb = () => {
    setNumber(randomNumber());
  };

  return (
    <div className="App">
      <header className="App-header">
        <div className={round}>
          {number.map((kazkas, i) => (
            <div key={i}>{kazkas}</div>
          ))}
          <div>{number}</div>
        </div>
        <button onClick={handleChangeShape}>change shape</button>
        <button onClick={handleNb}>random</button>
      </header>
    </div>
  );
}

export default App;
