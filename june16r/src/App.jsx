// import logo from './logo.svg';
import './bootstrap.css';
import './App.css';
import Create from './Components/Create';
import List from './Components/List';

function App() {
  return (
    <div classname="container">
      <div classname="row">
        <Create />
        <List />
        <div classname="col-5">Create</div>
      </div>
    </div>
  );
}

export default App;
