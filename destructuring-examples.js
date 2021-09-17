const theArray = ['first', 'second', 'third']
const theObject = {prop1: 'I am a prop', prop2: 'second prop'}

//now lets try the destructuring
const [first, second, third] = theArray
console.log('first: ', first)
console.log('second: ', second)
console.log('third: ', third)

//and now the object
const {prop1, prop2} = theObject
console.log('prop1: ', prop1)
console.log('prop2: ', prop2)

//last with custom names
const { prop1: awesome } = theObject
console.log('name: ', awesome)
