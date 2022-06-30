import { useState } from 'react';
import './App.css';
// import Hello from './Components/009/Hello';
// import Briedis from './Components/009/Briedis';
// import randColor from './Functions/randColors';

function App() {
  const [spalva, setSpalva] = useState('blue');

  // const [number, setNumber] = useState(1);
  // const cats = ['Pilkis', 'Murkis', 'rainis'];
  // const [kv, setKv] = useState([]);

  const stebuklas = (a) => {
    console.log('stebuklu stebuklas' + a);
    // setNumber(number + 1);
  };
  const kitasStebuklas = () => {
    console.log(' stebuklu stebuklas');
    setSpalva('red');
  };

  setSpalva((oldColor) => (oldColor === 'yellow' ? 'blue' : 'yellow'));

  // setSpalva('yellow');
  // const skaicius = () => {
  //   setNumber(number + 1);
  // };

  // const addKv = () => setKv((kvM) => [...kvM, randColor()]);
  // const REMkv = () => setKv((kvM) => kvM.slice(1));

  return (
    <div className="App">
      <header className="App-header">
        <h1 style={{ color: spalva }}>State</h1>

        <button onClick={() => stebuklas('Abra-cadabra')}>Press with!</button>
        <button onClick={kitasStebuklas}>Press W/O</button>

        {/* {
          <div className="kvc">
            {kv.map((c, i) => (
              <div key={i} className="kv" style={{ background: c }}></div>
            ))}
          </div>
        } */}

        <div className="cssround">round or not</div>
        {/* <button onClick={addKv}>-- press---</button> */}
        {/* <button onClick={REMkv}>-- remove---</button> */}

        {/* <button onClick={skaicius}>{number}</button> */}
        {/* {cats.map((cat, i) => ( */}
        {/* <div key={i}>{cat}</div> */}
        {/* ))} */}

        {/* <Hello spalva="pink" size="14" skaicius={3}></Hello> */}
        {/* <Briedis></Briedis> */}
      </header>
    </div>
  );
}

export default App;
