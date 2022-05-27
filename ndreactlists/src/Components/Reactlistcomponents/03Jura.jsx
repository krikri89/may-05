// import Valtis from './03Valtis';
// import Laivas from './03Laivas';
// import Sala from './03Sala';
import seaPlaners from './Data/Seaplanner';

// 3.Sukurti keturis komponentus. Jura, Valtis, Laivas, Sala. Jura tėvinis komponentas, kiti trys vaikiniai. Atvaizduoti masyvą seaPlaners pagal taisyklę: “man” - Valtis, “car” - Laivas, “animal” - Sala, “fish” - tiesiai Jura komponente (be jokio vaikinio komponento).

function Jura() {
  return (
    <>
      {seaPlaners.filter((items) =>
        (items.type === 'fish').map((items) => (
          <div key={items.id}>
            id: {items.id}, type: {items.type},<span> name: {items.name}</span>,
          </div>
        ))
      )}
    </>
  );
}
export default Jura;
    