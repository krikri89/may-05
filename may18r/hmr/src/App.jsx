import { useState } from 'react';
import './App.css';

// import Hello from './Components/009/Hello';
// import Briedis from './Components/009/Briedis';
import Zuikis from './Components/homework/01reactbase';
import Mike from './Components/homework/02';
import Zebrai from './Components/homework/03Zebrai';
import Barsukai from './Components/homework/04';
import Keturi from './Components/homework/05';
// import randColor from './Functions/randColors';

function App() {
  const [spalva, setSpalva] = useState('blue');
  const [number, setNumber] = useState(1);
  const cats = ['Pilkis', 'Murkis', 'rainis'];
  const [kv, setKv] = useState([]);

  const stebuklas = (a) => {
    console.log('stebuklu stebuklas' + a);
    setNumber(number + 1);
  };

  const kitasStebuklas = () => {
    console.log(' stebuklu stebuklas');
    setSpalva((oldColor) => (oldColor === 'yellow' ? 'blue' : 'yellow'));
    setSpalva('yellow');
  };

  const skaicius = () => {
    setNumber(number + 1);
  };

  const addKv = () => setKv((kvM) => [...kvM, 1]);
  const REMkv = () => setKv((kvM) => kvM.slice(1));

  return (
    <div className="App">
      <header className="App-header">
        <h1 style={{ color: spalva }}>State</h1>
        <button onClick={() => stebuklas('Abra-cadabra')}>Press with!</button>
        <button onClick={kitasStebuklas}>Press W/O</button>
        {
          <div className="kvc">
            {kv.map((c, i) => (
              <div key={i} className="kv" style={{ background: c }}></div>
            ))}
          </div>
        }
        <div className="cssround">round or not</div>
        <button onClick={addKv}>-- press---</button>
        <button onClick={REMkv}>-- remove---</button>
        <button onClick={skaicius}>{number}</button>
        {cats.map((cat, i) => (
          <div key={i}>{cat}</div>
        ))}

        <Zuikis />
        <Mike text="bla" size="45" />
        <Zebrai prop={2} />
        <Barsukai bold="Barsukai miega ziema" thin="Barsukai nemegsta sesku" />
        <Keturi text1="Keturi broliai" text2="3seserys" color="yellow" />
      </header>
    </div>
  );
}

export default App;
