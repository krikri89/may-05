import { useState } from 'react';
import './App.css';
// Sukurti aplikaciją, kuri turi mygtukus plus ir minus, bei atvaizduoja skaičių 0. Paspaudus plus mygtuką, skaičius padidėja 1, o paspaudus minus- sumažėja 3

function App() {
  const [number, setNumber] = useState(0);

  const addNb = () => {
    setNumber((number) => number + 1);
  };

  const removeNb = () => {
    setNumber((number) => number - 3);
  };
  return (
    <div className="App">
      <header className="App-header">
        <div>{number}</div>
        <button onClick={addNb}>+</button>
        <button onClick={removeNb}>-</button>
      </header>
    </div>
  );
}

export default App;
