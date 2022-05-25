import { useState } from 'react';
import './App.css';
import rand from './Components/Function/function';


function App() {
  const [spalva, setSpalva] = useState('blue');
  const [number, setNumber] = useState(1);
  const [kv, setKv] = useState([]);
  const cats = ['Pilkis', 'Rainis', 'Murkis'];

  const stebuklas = () => {
    // console.log('stebuklas');
    setSpalva((bla) => (bla === 'crimson' ? 'blue' : 'crimson'));
  };
  const changeNumber = () => {
    setNumber(number + 1);
    // arba setNumber(betkoks => betkoks +1);
  };
  const addKv = () => {
    setKv((masyvas) => [...masyvas, rand()]);
  };
  const removeKv = () => {
    setKv((betkas) => [betkas.slice(1)]);
  };

  return (
    <div className="App">
      <header className="App-header">
        <h1 style={{ color: spalva }}>state{number}</h1>
        <button onClick={() => stebuklas('Abra')}>Press with!</button>
        <button onClick={stebuklas}>Press W/O!</button>
        <button onClick={changeNumber}>{number}</button>
        {cats.map((katinuVardai, i) => (<div key={i}>{katinuVardai}</div>
        ))}

        
        <div className="newClassContainer">
          {kv.map((kazkas, c) => (
            <div key={c} className="newClass"  style={{ background: kazkas }}>
              {c}</div>))}

              
        </div>
        <button onClick={addKv}>add</button>
        <button onClick={removeKv}>remove</button>
      </header>
    </div>
  );
}

export default App;
