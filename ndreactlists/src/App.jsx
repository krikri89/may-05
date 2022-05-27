import './App.css';
import seaPlaners from './Components/Reactlistcomponents/Data/Seaplanner';
import Tvenkinys from './Components/Reactlistcomponents/Tvenkinys';
import Bala from './Components/Reactlistcomponents/Bala';

function App() {
  return (
    <div className="App">
      <header className="App-header">
        <Bala />
        <br /> <Tvenkinys seaPlaners={seaPlaners} />
        
      </header>
    </div>
  );
}

export default App;
