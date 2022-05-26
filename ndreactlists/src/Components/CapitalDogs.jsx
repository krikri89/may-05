import dogs from './data/data';

// 4.Atvaizduoti masyvą dogs. Šunis, kurie prasideda didžiąja raide praleisti (neatvaizduoti).

function Capital() {
  return (
    <>
      {dogs.map((dog, i) =>
        dog.toLocaleLowerCase() === dog ? (
          <div className="dogcage">{dog}</div>
        ) : (
          ''
        )
      )}
    </>
  );
}
export default Capital;
