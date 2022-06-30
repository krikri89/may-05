import dogs from './data/data';
// 5.Naudojant masyvą dogs atvaizduoti skaičius, kurie yra lygūs žodžių masyve ilgiui. Skaičius, didesnius nei 6 atvaizduoti žaliai, kitus raudonai.

function Doglength() {
  return (
    <>
      {dogs.map((dog, i) => (
        <div
          key={i}
          style={{
            color: dog.length > 6 ? 'green' : 'red',
          }}
        >
          {dog.length}
        </div>
      ))}
    </>
  );
}

export default Doglength;
