class Node:
    def __init__(self, data):
        self.data = data
        self.next = None


class LinkedList:
    def __init__(self):
        self.head = None
        self.tail = None

    def add(self, data):
        new_node = Node(data)

        if self.head is None:
            self.head = new_node
            self.tail = new_node
        else:
            self.tail.next = new_node
            self.tail = new_node

    def remove(self):
        if self.head is None:
            return None

        removed_node = self.head
        self.head = self.head.next
        if self.head is None:
            self.tail = None

        return removed_node.data

    def print(self):
        node = self.head
        while node != None:
            print(node.data, end =" => ")
            node = node.next
        print("NULL")

    def is_empty(self):
        return self.head is None
