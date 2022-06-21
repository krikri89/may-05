import { useState, useEffect } from 'react';
import Home from './Components/Home';
import './App.css';
import axios from 'axios';
import Form from './Components/Form';

function App() {
  const [list, setList] = useState([]);

  const [showForm, setShowForm] = useState(false);

  const [formData, setFormData] = useState(null);

  useEffect(() => {
    axios
      .get('http://bankobankas.lt/api/home')
      .then((res) => setList(res.data));
  }, []);

  useEffect(() => {
    if (formData === null) return; // jeigu tuscias nieko nespausdinam
    axios.post('http://bankobankas.lt/api/form', formData).then((res) => {
      console.log(res.data);
    });
  }, [formData]);

  return (
    <>
      <Home list={list} />
      <button onClick={() => setShowForm((f) => !f)}>Fill in form </button>
      <Form showForm={showForm} setFormData={setFormData} />
    </>
  );
}

export default App;
