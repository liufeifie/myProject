// indexOf()方法兼容写法
if (typeof Array.prototype.indexOf !== 'function') {
  Array.prototype.indexOf = function (searchStr, startIndex) {
    startIndex = startIndex || 0
    for (var i = 0, len = this.length; i < len; i++) {
      if (i >= startIndex && this[i] === searchStr) return i
    }
    return -1
  }
}

// lastIndexOf()方法兼容写法
if (typeof Array.prototype.lastIndexOf !== 'function') {
  Array.prototype.lastIndexOf = function (searchElement, fromIndex) {
    var len = this.length;
    arguments.length === 1 ? fromIndex = -1 : fromIndex = fromIndex * 1 || 0;
    if (fromIndex < 0) fromIndex = Math.max(0, fromIndex + len)
    for (var k = len - 1; k > -1; k--) {
      if (k <= fromIndex && this[k] === searchElement) {
        return k;
      }
    }
    return -1;
  };
}

// reduce()方法兼容写法
if (typeof Array.prototype.reduce !== "function") {
  Array.prototype.reduce = function (callback, initialValue ) {
    var previous = initialValue, k = 0, length = this.length;
    if (typeof initialValue === "undefined") {
      previous = this[0];
      k = 1;
    }
    if (typeof callback === "function") {
      for (k; k < length; k++) {
        /* 通过 hasOwnProperty 查找是否是对象本身的属性，而不是继承来的属性 */
        this.hasOwnProperty(k) && (previous = callback(previous, this[k], k, this));
      }
    }
    return previous;
  };
}
// reduceRight()方法兼容写法
if (typeof Array.prototype.reduceRight !== "function") {
  Array.prototype.reduceRight = function (callback, initialValue ) {
    var length = this.length, previous = initialValue, k = length - 1;
    if (typeof initialValue === "undefined") {
      previous = this[k];
      k--;
    }
    if (typeof callback === "function") {
      for (k; k > -1; k--) {
        /* 通过 hasOwnProperty 查找是否是对象本身的属性，而不是继承来的属性 */
        this.hasOwnProperty(k) && (previous = callback(previous, this[k], k, this));
      }
    }
    return previous;
  };
}

// map() 方法兼容写法
if (typeof Array.prototype.map !== "function") {
  Array.prototype.map = function (fn, context) {
    var arr = [];
    if (typeof fn === "function") {
      for (var k = 0, length = this.length; k < length; k++) {
        arr.push(fn.call(context, this[k], k, this));
      }
    }
    return arr;
  };
}

// forEach() 方法兼容写法
if(typeof Array.prototype.forEach !== 'function'){
  Array.prototype.forEach = function(fn,context){
    for(var k = 0,length = this.length; k < length; k++){
      if(typeof fn === 'function' && Object.prototype.hasOwnProperty.call(this,k)){
        fn.call(context,this[k],k,this);
      }
    }
  }
}

// filter() 方法兼容写法
if (typeof Array.prototype.filter !== "function") {
  Array.prototype.filter = function (fn, context) {
    var arr = [];
    if (typeof fn === "function") {
      for (var k = 0, length = this.length; k < length; k++) {
        fn.call(context, this[k], k, this) && arr.push(this[k]);
      }
    }
    return arr;
  };
}

// some() 方法兼容写法
if (typeof Array.prototype.some !== "function") {
  Array.prototype.some = function (fn, context) {
    var passed = false;
    if (typeof fn === "function") {
      for (var k = 0, length = this.length; k < length; k++) {
        if (passed === true) break;
        passed = !!fn.call(context, this[k], k, this);
      }
    }
    return passed;
  };
}

// 字符串 trim() 方法兼容写法
if (typeof String.prototype.trim === "undefined") {
  String.prototype.trim = function () {
    return this.replace(/^\s+|\s+$/,'')
  }
}
// 字符串 ltrim() 方法兼容写法
if (typeof String.prototype.ltrim === "undefined") {
  String.prototype.ltrim = function () {
    return this.replace(/^\s+/,'')
  }
}

// 字符串 rtrim() 方法兼容写法
if (typeof String.prototype.rtrim === "undefined") {
  String.prototype.rtrim = function () {
    return this.replace(/\s+$/,'')
  }
}











// 数组求和
if (typeof Array.prototype.sum !== 'function') {
  Array.prototype.sum = function () {
    return this.reduce(function (prev, cur) {
      return prev + cur;
    })
  }
}

// 数组求积
if (typeof Array.prototype.product !== 'function') {
  Array.prototype.product = function () {
    return this.reduce(function (prev, cur) {
      return prev * cur;
    })
  }
}

// 数组求最大值
if (typeof Array.prototype.max !== 'function') {
  Array.prototype.max = function () {
    return this.reduce(function (prev, cur) {
      return prev > cur ? prev : cur;
    })
  }
}

// 数组求最小值
if (typeof Array.prototype.min !== 'function') {
  Array.prototype.min = function () {
    return this.reduce(function (prev, cur) {
      return prev < cur ? prev : cur;
    })
  }
}


