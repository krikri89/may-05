// import logo from './logo.svg';
import { useState } from 'react';
import './App.css';

function App() {
  const [round, setRound] = useState([]);
  const [number, setNumber] = useState([]);

  const handleChangeShape = () => {
    setRound((oldShape) => (oldShape === 'round' ? 'square' : 'round'));
  };
  const handleNb = () => {
    const min = 5;
    const max = 25;
    const rand = min + Math.number() * (max - min);
    setNumber({rand});
  };

  return (
    <div className="App">
      <header className="App-header">
        <div className="round">{handleChangeShape}</div>
        <button onClick={handleChangeShape} className={round}>
          change
        </button>
        <button onClick={handleNb}>random{number}</button>
      </header>
    </div>
  );
}

export default App;
