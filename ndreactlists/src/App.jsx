// import logo from './logo.svg';
import './App.css';
// import { useState } from 'react';
// import dogs from './Components/data/data';
import Dogies from './Components/Mappeddogs';
import Numbered from './Components/NumberedDogs';
import SortedDogs from './Components/SortedDogs';
import Capital from './Components/CapitalDogs';
import Doglength from './Components/DogLength';

function App() {
  //   const [circle, setCircle] = useState();

  return (
    <div className="App">
      <header className="App-header">
        <Dogies className="dogcage" />
        <SortedDogs className="dogcircle" />
        <Numbered className="dogin" />
        <Capital className="dogcage" />
        <Doglength />
      </header>
    </div>
  );
}

export default App;
