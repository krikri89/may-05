import seaPlaners from './Data/Seaplanner';

function Valtis() {
  return seaPlaners.map((items, i) => (
    <div key={i}>{items.type === 'man'}</div>
  ));
}
export default Valtis;
