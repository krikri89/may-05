// import logo from './logo.svg';
import './App.css';
// import Hello from './Components/009/Hello';
// import Briedis from './Components/009/Briedis';
import Zuikis from './Components/homework/01reactbase';
import Mike from './Components/homework/02';
import Zebrai from './Components/homework/03Zebrai';
import Barsukai from './Components/homework/04';
import Keturi from './Components/homework/05';

function App() {
  return (
    <div className="App">
      <header className="App-header">
        {/* <Hello spalva="pink" size="14" skaicius={3}></Hello> */}
        {/* <Briedis></Briedis> */}
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
