import axios from './create-api'
import apiUrl from './config-api'
let get = axios.get
let post = axios.post
let apiArr = apiUrl

export {
  get,
  post,
  apiArr
}
