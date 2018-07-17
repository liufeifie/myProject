export function dateFormat (time, format) {
  let Y
  let M
  let D
  let h
  let m
  let s
  if (time) {
    let date = new Date(time)
    Y = date.getFullYear()
    M = date.getMonth() + 1
    M = M < 10 ? '0' + M : M
    D = date.getDate()
    D = D < 10 ? '0' + D : D
    h = date.getHours()
    h = h < 10 ? '0' + h : h
    m = date.getMinutes()
    m = m < 10 ? '0' + m : m
    s = date.getSeconds()
    s = s < 10 ? '0' + s : s
  }
  if (format === 'Y-M-D') {
    return Y + '-' + M + '-' + D
  } else if (format === 'Y-M-D h:m:s') {
    return Y + '-' + M + '-' + D + ' ' + h + ':' + m + ':' + s
  } else {
    return time
  }
}