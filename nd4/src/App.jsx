// import logo from './logo.svg';
import './App.css';
import { useState } from 'react';
// Sukurti aplikaciją, kuri turi mygtuką add, kurį paspaudus vieną kartą atsiranda mėlynas kvadratas, paspaudus du - du kvadratai ir t.t.

function App() {
  const [kvadratas, setKvadratas] = useState([]);

  const addKvadrata = () => {
    setKvadratas((masyvas) => [...masyvas, 1]);
  };
  return (
    <div className="App">
      <header className="App-header">
        <div className="containerStyle">
          {kvadratas.map((kazkas, i) => (
            <div key={i} className="kvStyle" style={{ background: kazkas }}>
              {i}
            </div>
          ))}
        </div>
        <button onClick={addKvadrata}>add</button>
      </header>
    </div>
  );
}

export default App;
