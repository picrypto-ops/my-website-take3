document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("contactForm")

  form.addEventListener("submit", (event) => {
    event.preventDefault()

    if (validateForm()) {
      form.submit()
    }
  })

  function validateForm() {
    let isValid = true
    const name = document.getElementById("name")
    const email = document.getElementById("email")
    const subject = document.getElementById("subject")
    const message = document.getElementById("message")

    if (name.value.trim() === "") {
      isValid = false
      showError(name, "Name is required")
    } else {
      removeError(name)
    }

    if (email.value.trim() === "") {
      isValid = false
      showError(email, "Email is required")
    } else if (!isValidEmail(email.value)) {
      isValid = false
      showError(email, "Please enter a valid email address")
    } else {
      removeError(email)
    }

    if (subject.value.trim() === "") {
      isValid = false
      showError(subject, "Subject is required")
    } else {
      removeError(subject)
    }

    if (message.value.trim() === "") {
      isValid = false
      showError(message, "Message is required")
    } else {
      removeError(message)
    }

    return isValid
  }

  function showError(input, message) {
    const formGroup = input.parentElement
    const errorElement = formGroup.querySelector(".error-message") || document.createElement("div")
    errorElement.className = "error-message"
    errorElement.textContent = message
    if (!formGroup.querySelector(".error-message")) {
      formGroup.appendChild(errorElement)
    }
    input.classList.add("error")
  }

  function removeError(input) {
    const formGroup = input.parentElement
    const errorElement = formGroup.querySelector(".error-message")
    if (errorElement) {
      formGroup.removeChild(errorElement)
    }
    input.classList.remove("error")
  }

  function isValidEmail(email) {
    const re =
      /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    return re.test(String(email).toLowerCase())
  }
})

