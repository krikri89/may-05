import { useEffect } from 'react';
import { useState } from 'react';
import './App.css';
import './bootstrap.css';
import Create from './Components/Create';
import DataContext from './Components/DataContext';
import List from './Components/List';
import axios from 'axios';

function App() {
  const [animals, setAnimals] = useState([]);

  useEffect(() => {
    axios
      .get('http://localhost/vienaragiai/may-05/june16server/animals')
      .then((res) => setAnimals(res.data));
  }, []);

  return (
    <DataContext.Provider value={{ animals }}>
      <div className="container">
        <div className="row">
          <Create />
          <List />
        </div>
      </div>
    </DataContext.Provider>
  );
}

export default App;
