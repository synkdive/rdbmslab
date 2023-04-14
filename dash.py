import streamlit as st
import mysql.connector

# Connect to the MySQL database
conn = mysql.connector.connect(
    host="localhost",
    user="username",
    password="password",
    database="fast_food_inventory"
)
cursor = conn.cursor()

# Streamlit app
def app():
    # Add product
    def add_product():
        st.subheader("Add Product")
        product_name = st.text_input("Product Name")
        product_description = st.text_input("Product Description")
        product_price = st.number_input("Product Price", step=0.01)
        supplier_id = st.selectbox("Supplier", suppliers)
        if st.button("Add"):
            # Insert product into Products table
            cursor.execute("INSERT INTO Products (Product_Name, Product_Description, Product_Price, Supplier_ID) "
                           "VALUES (%s, %s, %s, %s)",
                           (product_name, product_description, product_price, supplier_id))
            conn.commit()
            st.success("Product added successfully!")
    
    # View products
    def view_products():
        st.subheader("View Products")
        cursor.execute("SELECT * FROM Products")
        products = cursor.fetchall()
        for product in products:
            st.write(f"Product ID: {product[0]}, Product Name: {product[1]}, "
                     f"Product Description: {product[2]}, Product Price: {product[3]}, "
                     f"Supplier ID: {product[4]}")
    
    # View suppliers
    def view_suppliers():
        st.subheader("View Suppliers")
        cursor.execute("SELECT * FROM Suppliers")
        suppliers = cursor.fetchall()
        for supplier in suppliers:
            st.write(f"Supplier ID: {supplier[0]}, Supplier Name: {supplier[1]}, "
                     f"Supplier Contact: {supplier[2]}")
    
    # Main page
    st.title("Fast Food Inventory Management")
    st.sidebar.subheader("Navigation")
    page = st.sidebar.radio("Go to:", ("Add Product", "View Products", "View Suppliers"))
    
    # Fetch suppliers for dropdown
    cursor.execute("SELECT * FROM Suppliers")
    suppliers = cursor.fetchall()
    suppliers = [(supplier[0], supplier[1]) for supplier in suppliers]
    
    # Display pages based on user selection
    if page == "Add Product":
        add_product()
    elif page == "View Products":
        view_products()
    elif page == "View Suppliers":
        view_suppliers()

# Run the Streamlit app
if __name__ == '__main__':
    app()
