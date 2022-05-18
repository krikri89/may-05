// import logo from './logo.svg';
import './App.css';
import Hello from './Components/009/Hello';
import Briedis from './Components/009/Briedis';

function App() {
  return (
    <div className="App">
      <header className="App-header">
        <Hello spalva="pink" size="14" skaicius={3}></Hello>
        <Briedis></Briedis>
      </header>
    </div>
  );
}

export default App;
