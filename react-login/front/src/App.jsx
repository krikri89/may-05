import './App.css';
import Login from './Components/Login';
import Home from './Components/Home';
// import { login } from ".'Functions/auth";

function App() {
  // login('blabla-bebras');

  return (
    <div className="App">
      <header className="App-header">
        <Home />
        <br />
        <Login />
      </header>
    </div>
  );
}

export default App;
