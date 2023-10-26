const moduleContext = import.meta.globEager('./*.js');
const modules = {};

for (const path in moduleContext) {
  if (path === './index.js') continue;
  const moduleName = path.replace(/(\.\/|\.js)/g, '');
  modules[moduleName] = moduleContext[path].default;
}

export default modules;
