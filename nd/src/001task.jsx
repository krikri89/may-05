// import logo from './logo.svg';
// kuri turi mygtuką change ir atvaizduoja apskritimą. Paspaudus mygtuką change apskritimas turi pavirsti į kvadratą, o paspaudus dar kartą vėl pavirsti apskritimu.

import { useState } from 'react';

import './App.css';

function App() {
  const [round, setRound] = useState([]);

  const handleChangeShape = () => {
    setRound((oldShape) => (oldShape === 'round' ? 'square' : 'round'));
  };

  return (
    <div className="App">
      <header className="App-header">
        <button onClick={handleChangeShape} className={round}>
          change
        </button>
      </header>
    </div>
  );
}

export default App;
