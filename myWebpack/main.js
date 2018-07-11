const path = require('path')
// 连接路径
console.log('joint path : ' + path.join('/test', 'test1', '2slashes/1slash', 'tab', '..'));
console.log('resolve : ' + path.resolve('main.js'));
console.log('***********', path, __dirname)