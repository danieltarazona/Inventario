- User hasMany Comment
- Comment belongsTo User

- User haveMany Issue
- Issue belongsTo User

- User hasOne State
- State belongsToMany User

- User hasMany Reserve
- Reserve belongsTo User

- User hasMany Loans
- Loan belongsTo User

- Program hasMany User
- User belongsTo Program

- Headquarter hasMany Programs
- Programs belongsToMany City

- Headquarter hasMany User
- User belongsTo Headquarter

- Manufacturer hasMany Device
- Device belongsTo Manufacturer

- Maintenance hasMany Device
- Device belongsToMany Maintenance

- Device hasOne State
- State belongsToMany Device

- Headquarter hasMany Device
- Device belongsTo Headquarter

- Headquarter hasMany Storer
- Storer belongsTo Headquarter

- Storer hasMany Device
- Device belongsTo Storer

- Category hasMany Device
- Device belongsTo Category

- Reserve hasMany Device
- Device belongsToMany Reserve

- Storer hasMany Reserve
- Reserve belongsTo Storer

- Loan hasMany Device
- Device belongsToMany Loan

- Storer hasMany Loan
- Loan belongsTo Storer

- City hasMany User
- User belongsTo City

- City hasMany Headquarter
- Headquarter belongsTo City

- Issue hasMany Comment
Comment belongsTo Issue
