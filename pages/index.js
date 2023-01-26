import Head from "next/head";
import { useState, ReactDOM } from "react";
import styles from "./index.module.css";

export default function Home() {
  const [msgInput, setMsgInput] = useState("");
  const [buttonDisabled, setButtonDisabled] = useState(false);

  async function onSubmit(event) {
    event.preventDefault();
    try {
      const response = await fetch("/api/generate", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({ msg: msgInput }),
      });

      const data = await response.json();
      if (response.status !== 200) {
        throw (
          data.error ||
          new Error(`Request failed with status ${response.status}`)
        );
      }

      // setResult(data.result);
      showMessage(data.result, "ai");
      setMsgInput("");
      setButtonDisabled(false);
    } catch (error) {
      // Consider implementing your own error handling logic here
      console.error(error);
      alert(error.message);
    }
  }

  function showMessage(text, sender) {
    const li = document.createElement("li")


    const img = document.createElement("img")
    li.appendChild(img)
    if (sender == "ai") {
      img.src = "/robot.png"
      li.classList.add(`${styles.ai}`)
    } else {
      img.src = "/user.png"
    }
    img.classList.add(`${styles.icon}`)

    li.appendChild(document.createTextNode(text))
    li.classList.add(`${styles.message}`)


    const ul = document.getElementById("messageHistory")
    ul.appendChild(li)
  }

  <li>
    <img src="/robot.png" className={styles.icon} />
    <p>text</p>
  </li>

  return (
    <div>
      <Head>
        <title>Creatie Soft 2023</title>
        <link rel="icon" href="/robot.png" />
      </Head>

      <main className={styles.main}>
        {/* <div className={styles.starter + (starterVisibility == false ? ` ${styles.hidden}` : '')}> */}
        <img src="/robot.png" className={styles.icon} />
        <h3>Introduceți o cerință</h3>
        <form onSubmit={(event) => {
          onSubmit(event)
          if (msgInput != '') {
            showMessage(msgInput, "user");
            setButtonDisabled(true);
          }
          // setStarterVisibility(styles.starter_hidden)
        }}>
          <input
            type="text"
            name="msg"
            placeholder="Introduceți o cerință"
            autoComplete="off"
            autoCapitalize="sentences"
            value={msgInput}
            onChange={(e) => setMsgInput(e.target.value)}
          />
          <input type="submit" value="Trimite" disabled={buttonDisabled} className={buttonDisabled ? styles.disabled : ''} />
        </form>
        <ul className={styles.messageHistory} id="messageHistory"></ul>

        {/* </div> */}
        {/* <div className={styles.history + (historyVisibility == false ? ` ${styles.hidden}` : '')}>

        </div>
        <div className={styles.messageInput + (messageInputVisiblity == false ? ` ${styles.hidden}` : '')}>

        </div> */}
      </main>
    </div>
  );
}
