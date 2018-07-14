import http from './create-api'
import urls from './config-api'

let get = http.get
let post = http.post

export {
  get,
  post,
  urls
}
