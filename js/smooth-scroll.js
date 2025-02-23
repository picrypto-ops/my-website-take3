document.addEventListener("DOMContentLoaded", () => {
  const scrollDown = document.querySelector(".scroll-down")
  const content = document.querySelector("#content")

  if (scrollDown && content) {
    scrollDown.addEventListener("click", (e) => {
      e.preventDefault()
      content.scrollIntoView({ behavior: "smooth" })
    })
  }
})

