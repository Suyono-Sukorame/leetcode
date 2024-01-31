/**
 * @param {string} path
 * @return {string}
 */
var simplifyPath = function (path) {
  const parts = path.split("/");
  const stack = [];

  for (const part of parts) {
    if (part === "..") {
      stack.pop();
    } else if (part !== "" && part !== ".") {
      stack.push(part);
    }
  }

  return "/" + stack.join("/");
};

console.log(simplifyPath("/home/"));
console.log(simplifyPath("/../"));
console.log(simplifyPath("/home//foo/"));
