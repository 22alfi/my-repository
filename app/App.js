const express = require("express");
const app = express();
const port = process.env.PORT || 3000;

app.get("/", (req, res) => {
  res.send(`
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dark Blue Form</title>
    <style>
      body {
        margin: 0;
        font-family: Arial, sans-serif;
        background: #071A31;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
      }
      .card {
        background: #0f2743;
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0 0 20px rgba(0,0,0,0.4);
        width: 350px;
      }
      h1 {
        text-align: center;
        margin-bottom: 1rem;
      }
      label {
        display: block;
        margin-bottom: 0.5rem;
      }
      input, textarea {
        width: 100%;
        padding: 0.75rem;
        margin-bottom: 1rem;
        border: none;
        border-radius: 8px;
        background: rgba(255,255,255,0.1);
        color: white;
      }
      input::placeholder, textarea::placeholder {
        color: rgba(255,255,255,0.5);
      }
      button {
        width: 100%;
        padding: 0.75rem;
        background: #2ea6ff;
        border: none;
        border-radius: 8px;
        color: white;
        font-size: 1rem;
        cursor: pointer;
      }
      button:hover {
        background: #178de6;
      }
    </style>
  </head>
  <body>
    <div class="card">
      <h1>Contact Us</h1>
      <form>
        <label>Name</label>
        <input type="text" placeholder="Your name" required />
        <label>Email</label>
        <input type="email" placeholder="you@example.com" required />
        <label>Message</label>
        <textarea rows="4" placeholder="Say hi..."></textarea>
        <button type="submit">Send</button>
      </form>
    </div>
  </body>
  </html>
  `);
});

app.listen(port, () => {
  console.log(`Server running at http://localhost:${port}`);
});

