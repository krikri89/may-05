import seaPlaners from './Data/Seaplanner';

function Sala() {
  return seaPlaners.map((items, i) => (
    <div key={i}>{items.type === 'animal'}</div>
  ));
}
export default Sala;
