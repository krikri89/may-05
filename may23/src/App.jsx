// import logo from './logo.svg';
import './App.css';
import { useEffect, useState } from 'react';
import axios from 'axios';

function App() {
  const [count, setCount] = useState(1);
  const [cats, setCats] = useState([]);
  useEffect(() => {
    console.log('GO');
  }, []); // jeigu i useeffect paduodamas antras componentas yra tuscias masyvas, mes turesime paliesta funcija tada ir tik tada componen uzisikrauna ir buna pasiruoses darbui. jeigu mes no

  useEffect(() => {
    axios.get('http://localhost/vienaragiai/may-05/011%20php/').then((res) => {
      console.log(res);
      setCats(res.data);
    });
  }, []);

  return (
    <div className="App">
      <header className="App-header">
        <h1>{count}</h1>
        <button onClick={() => setCount((c) => c + 1)}>+1</button>
        {cats.map((c, i) => (
          <div key={i}>{c}</div>
        ))}
      </header>
    </div>
  );
}

export default App;
