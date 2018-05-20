import faker from 'faker'
import YANG from 'yet-another-name-generator'
// import _ from 'lodash'

// import { periodsItemNbr } from './index'

export function getMostListenedAlbums (/* options */) {
  const itemsNbr = Math.floor(Math.random() * 8) + 3

  const data = []
  const labels = []

  for (let i = 1; i < itemsNbr; ++i) {
    data[i] = (Math.floor(Math.random() * 58)) + 7
    labels[i] = YANG.generate() + ' by ' + faker.address.streetName()
  }

  console.log(data)

  return {data: data, labels: labels}
}
