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
  const [createAnimal, setCreateAnimal] = useState(null);

  useEffect(() => {
    axios
      .get('http://localhost/vienaragiai/may-05/june16server/animals')
      .then((res) => setAnimals(res.data));
  }, []);

  useEffect(() => {
    if (null === createAnimal) return; //jeigu nieko nera, nieko negrazinti
    axios
      .post(
        'http://localhost/vienaragiai/may-05/june16server/animals',
        createAnimal
      )
      .then((res) => setAnimals(res.data));
  }, [createAnimal]);

  return (
    <DataContext.Provider
      value={{
        animals,
        setCreateAnimal,
      }}
    >
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
