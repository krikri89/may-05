import dogs from './data/data';

// 1.Atvaizduoti masyvą dogs. Kiekvienas šuo atskirame kvadrate.

function Dogies() {
  return (
    <>
      {dogs.map((kas, i) => (
        <div key={i} className="dogcage">
          {kas}
        </div>
      ))}
    </>
  );
}
export default Dogies;
