import { useState } from 'react';

function Form({ showForm, setFormData }) {
  const [alabama, setAlabama] = useState('');

  const go = () => {
    setFormData({ alabama });
  };

  if (!showForm) {
    // if form is empty show nothing
    return null;
  }
  return (
    <>
      <fieldset>
        <legend>Enter</legend>
        <form method="post">
          <input
            type="text"
            name="alabama"
            value={alabama}
            onChange={(e) => setAlabama(e.target.value)}
          />
          <button type="button" onClick={go}>
            GO
          </button>
        </form>
      </fieldset>
    </>
  );
}
export default Form;
