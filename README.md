In the example code I provided, I did not explicitly use any design pattern, but I did follow SOLID and GRASP principles.

**SOLID principles:**

**Single Responsibility Principle:** Each class has a single responsibility, such as Account for managing an individual account, and Operation for managing operations between accounts.

**Open/Closed Principle:** The Account class is open for extension by allowing new transaction types to be added, but closed for modification by not allowing direct access to the account balance.

**Liskov Substitution Principle:** The Account class can be substituted with its subclasses without affecting the correctness of the system.

**Interface Segregation Principle:** Each class has a minimal set of public methods required for its functionality, such as Account with deposit(), withdraw(), transfer(), and getTransactions() methods, and Operation with methods for performing transactions and retrieving account information.

**Dependency Inversion Principle:** The Operation class depends on the Account class through the use of the Account interface, which allows for flexible implementation.

**GRASP principles:**

**Creator:** The Operation class is responsible for creating and managing the Account objects.

**Controller:** The Operation class acts as a controller for performing transactions and retrieving account information.

**Information Expert:** The Account class has the necessary information and methods to manage its own transactions and calculate its balance.