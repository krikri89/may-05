// import logo from './logo.svg';
import './App.css';
import { useState } from 'react';
// Sukurti aplikaciją, kuri turi mygtuką add, kurį paspaudus vieną kartą atsiranda mėlynas kvadratas, paspaudus du - du kvadratai ir t.t.

function App() {
  const [kvadratas, setKvadratas] = useState([]);
  const [square, setSquare] = useState([]);
  const [square2, setSquare2] = useState([]);

  const addKvadrata = () => {
    setKvadratas((masyvas) => [...masyvas, '']);
  };

  const addRed = () => setSquare((raudonas) => [...raudonas, '']);

  const addBlue = () => setSquare2((blue) => [...blue, '']);
  const reset = () => setSquare((del) => del.splice());
  // const reset2 = () => setSquare2((del) => del.splice());

  return (
    <div className="App">
      <header className="App-header">
        {
          <div className="container">
            {kvadratas.map((kazkas, i) => (
              <div key={i} className="kvadratas">
                {kazkas}
              </div>
            ))}
          </div>
        }
        <button onClick={addKvadrata}>add</button>
        {/* Sukurti aplikaciją, kuri turi mygtukus add red, add blue ir reset. Paspaudus add red, prisideda raudonas kvadratas, paspaudus add blue - mėlynas ir t.t. Spaudinėjant prisideda vis daygiau kvadratų. Paspaudus reset viskas išsitrina */}
        <div className="redbig">
          {square.map((daiktas, c) => (
            <div key={c} className="redsmall">
              {daiktas}
            </div>
          ))}
        </div>
        <div className="redbig">
          {square2.map((bla, c) => (
            <div key={c} className="blue">
              {bla}
            </div>
          ))}
        </div>

        <button onClick={addRed}>add red</button>
        <button onClick={addBlue}>add blue</button>
        <button onClick={reset}>reset</button>
      </header>
    </div>
  );
}

export default App;
