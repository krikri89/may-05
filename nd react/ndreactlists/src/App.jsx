import './App.css';
import seaPlaners from './Components/Reactlistcomponents/Data/Seaplanner';
import Tvenkinys from './Components/Reactlistcomponents/02Tvenkinys';
import Bala from './Components/Reactlistcomponents/01Bala';
import Jura from './Components/Reactlistcomponents/03Jura';

function App() {
  return (
    <div className="App">
      <header className="App-header">
        <Bala />
        <br />
        <Tvenkinys seaPlaners={seaPlaners} />
        <br />
        <Jura />
      </header>
    </div>
  );
}

export default App;
