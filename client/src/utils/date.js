export function getDate() {
  let date = new Date()

  const options = {
    day: "2-digit",
    month: "long",
    hour: "2-digit",
    minute: "2-digit"
  }

  return new Intl.DateTimeFormat('ru-RU', options).format(date)
}