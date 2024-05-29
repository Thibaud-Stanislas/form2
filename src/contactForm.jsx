import React, { useState } from 'react';
import axios from 'axios';

function ContactForm() {
  const [formData, setFormData] = useState({
    department: '',
    firstName: '',
    lastName: '',
    email: '',
    subject: '',
    message: ''
  });
  const [errorMessage, setErrorMessage] = useState('');
  const [successMessage, setSuccessMessage] = useState('');

  const handleInputChange = (e) => {
    const { name, value } = e.target;
    setFormData({
      ...formData,
      [name]: value
    });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
  
    setSuccessMessage('');
  
    for (const key in formData) {
      if (formData[key] === '') {
        setErrorMessage('Veuillez remplir tous les champs.');
        return;
      }
    }
  
    try {
      const response = await axios.post('http://localhost:8765/contact/submit-message', formData);
      if (response.data.response.status === 'success') {
        setSuccessMessage(response.data.response.message);
        setFormData({
          department: '',
          firstName: '',
          lastName: '',
          email: '',
          subject: '',
          message: ''
        });
        setErrorMessage('');
      } else {
        setErrorMessage(response.data.response.message);
      }
    } catch (error) {
      setErrorMessage('Une erreur s\'est produite. Veuillez réessayer.');
    }
  };

  return (
    <section className="form-container">
      <form onSubmit={handleSubmit} className="form">
        <h2>Contactez-nous</h2>
        {errorMessage && <p className="error-message">{errorMessage}</p>}
        {successMessage && <p className="success-message">{successMessage}</p>}
        <div className="selection">
          <label htmlFor="department">Département  <span>*</span></label>
          <select id="department" name="department" value={formData.department} onChange={handleInputChange}>
            <option value="">Sélectionnez un département</option>
            <option value="Trésorerie">Trésorerie</option>
            <option value="SAV">SAV</option>
            <option value="Commercial">Commercial</option>
            <option value="Ressources humaines">Ressources humaines</option>
          </select>
        </div>
        <div className="form-group">
          <label htmlFor="firstName">Prénom  <span>*</span></label>
          <input type="text" id="firstName" name="firstName" placeholder='Prénom' value={formData.firstName} onChange={handleInputChange} />
        </div>
        <div className="form-group">
          <label htmlFor="lastName">Nom  <span>*</span></label>
          <input type="text" id="lastName" name="lastName" placeholder='Nom' value={formData.lastName} onChange={handleInputChange} />
        </div>
        <div className="form-group">
          <label htmlFor="email">E-mail  <span>*</span></label>
          <input type="email" id="email" name="email" placeholder='E-mail' value={formData.email} onChange={handleInputChange} />
        </div>
        <div className="form-group">
          <label htmlFor="subject">Sujet  <span>*</span></label> {/* Corrected 'suject' to 'subject' */}
          <input type="text" id="subject" name="subject" placeholder='Sujet' value={formData.subject} onChange={handleInputChange} /> {/* Corrected 'suject' to 'subject' */}
        </div>
        <div className="form-group">
          <label htmlFor="message">Message  <span>*</span></label>
          <textarea id="message" name="message" placeholder='Insérez votre message' value={formData.message} onChange={handleInputChange}></textarea>
        </div>
        <button type="submit">Envoyer</button>
      </form>
    </section>
  );
}

export default ContactForm;