- User hasMany Comment
- Comment belongsTo User

- User haveMany Issue
- Issue belongsTo User

- State hasMany User
- User belongsTo State

- User hasMany Order
- Order belongsTo User

- User hasMany Sales
- Sale belongsTo User

- Program hasMany User
- User belongsTo Program

- Headquarter hasMany Program
- Program belongsToMany City

- Headquarter hasMany User
- User belongsTo Headquarter

- Manufacturer hasMany Product
- Product belongsTo Manufacturer

- Maintenance hasMany Product
- Product belongsToMany Maintenance

- Product hasOne State
- State belongsToMany Product

- Headquarter hasMany Product
- Product belongsTo Headquarter

- Headquarter hasMany Owner
- Owner belongsTo Headquarter

- Owner hasMany Product
- Product belongsTo Owner

- Category hasMany Product
- Product belongsTo Category

- Order hasMany Product
- Product belongsToMany Order

- Owner hasMany Order
- Order belongsTo Owner

- Sale hasMany Product
- Product belongsToMany Sale

- Owner hasMany Sale
- Sale belongsTo Owner

- City hasMany User
- User belongsTo City

- City hasMany Headquarter
- Headquarter belongsTo City

- Issue hasMany Comment
Comment belongsTo Issue
