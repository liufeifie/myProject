let log4js = require('log4js')
let path = require('path')
let logconfig = require('./log4js.json')
let logURL = './'
logconfig.appenders.map(item => {
  if (item.filename && logURL) {
    item.filename = path.join(logURL, item.filename)
  }
  return item
})
log4js.configure(logconfig)
let logInfo = log4js.getLogger('info')
let logErr = log4js.getLogger('error')

function printInfo (printObj, key = 'INFO', rout = null, sendTime = null, options = null, responseData = null) {
  let _tmpDate = sendTime ? `${sendTime.toLocaleString()}:${sendTime.getMilliseconds()}` : ''
  printObj.info(
    `${key}:${_tmpDate}${rout ? `[${typeof rout === 'object' ? JSON.stringify(rout) : rout}]` : ''}
        ${options ? `REQUEST:${JSON.stringify(options)};` : ''}${responseData ? `RESPONSE:${typeof responseData === 'object' ? JSON.stringify(responseData) : responseData};` : ''}`)
}
/**
 * @param key SEND: api call , RENDER: page drawing
 * @param rout  router info
 //  * @param reqTime api require time
 * @param options api params
 * @param resData api callback time
 */
module.exports = {
  logErr (key, rout, reqTime, options, resData) {
    printInfo(logErr, key, rout, reqTime, options, resData)
  },
  logInfo (key, rout, reqTime, options, resData) {
    printInfo(logInfo, key, rout, reqTime, options, resData)
  }
}