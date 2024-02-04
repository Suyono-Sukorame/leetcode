class EventEmitter {
  constructor() {
    this.subscriptions = new Map();
  }

  /**
   * @param {string} eventName
   * @param {Function} callback
   * @return {Object}
   */
  subscribe(eventName, callback) {
    if (!this.subscriptions.has(eventName)) {
      this.subscriptions.set(eventName, []);
    }

    const subscription = {
      callback,
      eventName,
    };

    this.subscriptions.get(eventName).push(subscription);

    return {
      unsubscribe: () => {
        const subscriptions = this.subscriptions.get(eventName);
        const index = subscriptions.indexOf(subscription);
        if (index !== -1) {
          subscriptions.splice(index, 1);
        }
      },
    };
  }

  /**
   * @param {string} eventName
   * @param {Array} args
   * @return {Array}
   */
  emit(eventName, args = []) {
    if (!this.subscriptions.has(eventName)) {
      return [];
    }

    const subscriptions = this.subscriptions.get(eventName);
    const results = subscriptions.map((subscription) => subscription.callback(...args));

    return results;
  }
}

const emitter = new EventEmitter();
const onClickCallback = () => 99;
const sub = emitter.subscribe("onClick", onClickCallback);

console.log(emitter.emit("onClick")); // Output: [99]
sub.unsubscribe();
console.log(emitter.emit("onClick")); // Output: []
